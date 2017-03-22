<?php

namespace App\Traits;
use App\Friendship;

trait Friendable
{
    public function add_friend($user_requested_id)
    {
        //if user try to send friend request to himself
        if($this->id === $user_requested_id)
        {
            return 0;
        }

        //if they are already friends
        if($this->is_friends_with($user_requested_id) === 1)
        {
            return "already friends";
        }


        if($this->has_pending_request_sent_to($user_requested_id) === 1)
        {
            return "Friend request sent already!";
        }
        if($this->has_pending_request_from($user_requested_id) === 1)
        {
            return $this->accept_friend($user_requested_id);
        }

        $friendship = Friendship::create([
            'requester' => $this->id,
            'user_requested' => $user_requested_id
        ]);

        if($friendship)
        {
            return 1;
        }
        return 0;
    }

    public function accept_friend($requester)
    {
        if($this->has_pending_request_from($requester) === 0)
        {
            return 0;
        }


        $friendship = Friendship::where('requester', $requester)
                                    ->where('user_requested', $this->id)->first();

        if($friendship)
        {
            $friendship->update([
                'status' => 1
            ]);

            return 1;
        }

        return 0;
    }


    public function friends()
    {
        //getting friends where the user is requester
        $friends = array();
        $f1 = Friendship::where('status',1)
                        ->where('requester', $this->id)->get();

        foreach($f1 as $friendship):
            array_push($friends, \App\User::find($friendship->user_requested));
        endforeach;

        //when user was the one who was requested
        $friends2 = array();

        $f2 = Friendship::where('status',1)
            ->where('user_requested', $this->id)->get();

        foreach($f2 as $friendship):
            array_push($friends2, \App\User::find($friendship->requester));
        endforeach;


        //adding them
        return array_merge($friends, $friends2);
    }

    public function pending_friend_requests()
    {
        $users = array();

        $friendship = Friendship::where('status',0)
                                    ->where('user_requested',$this->id)
                                    ->get();
        foreach($friendship as $friend):
            array_push($users, \App\User::find($friend->requester));
        endforeach;

        return $users;

    }

    public function pending_friend_requests_ids()
    {
        return collect($this->pending_friend_requests())->pluck('id')->toArray();
    }

    public function pending_friend_requests_sent()
    {
        $users = array();
        $friendships = Friendship::where('status',0)
                                    ->where('requester', $this->id)->get();

        foreach($friendships as $friendship):
            array_push($users, \App\User::find($friendship->user_requested));
        endforeach;

        return $users;
    }





    public function pending_friend_requests_sent_ids()
    {
        return collect($this->pending_friend_requests_sent())->pluck('id')->toArray();
    }

    public function has_pending_request_from($user_id)
    {
        if(in_array($user_id, $this->pending_friend_requests_ids()))
        {
            return 1;
        }
        else{
            return 0;
        }
    }

    //reverse of has_pending_request_from
    public function has_pending_request_sent_to($user_id)
    {
        if(in_array($user_id, $this->pending_friend_requests_sent_ids()))
        {
            return 1;
        }
        else{
            return 0;
        }
    }


    public function friends_ids()
    {
        //call friends method, convert array recieved to a collection, pluck id only from that
        return collect($this->friends())->pluck('id')->toArray();
    }

    public function is_friends_with($user_id)
    {
        if(in_array($user_id, $this->friends_ids()))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }


}