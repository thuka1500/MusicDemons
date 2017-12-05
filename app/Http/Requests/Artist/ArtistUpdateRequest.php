<?php

namespace App\Http\Requests\Artist;

use App\Entities\Artist;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ArtistUpdateRequest extends FormRequest {
    public function authorize() {
        return Auth::check();
    }
    
    public function rules() {
        return [
            'name'          => 'required|string|min:1|max:255',
            'year_started'  => 'required|integer|digits:4',
            'year_quit'     => 'nullable|integer|digits:4',
            'members'       => 'nullable',
            'past_members'  => 'nullable',
            'medium_types.*'   => 'required|integer',
            'medium_values.*'  => 'required|string'
        ];
    }
    
    public function getArtist() {
        return (object) [
            'name'        => $this->input('name'),
            'year_started'=> $this->input('year_started'),
            'year_quit'   => $this->input('year_quit'),
            'members'     => $this->getMembers(),
            'past_members'=> $this->getPastMembers(),
            'media'       => $this->getMedia()
        ];
    }
    
    public function getMedia() {
        $min = min(
            count($this->input('medium_types')),
            count($this->input('medium_values'))
        );
        $media = array();
        for($i = 0; $i < $min; $i++){
            $media[$i] = (object) [
                'medium_type_id'  =>  $this->input('medium_types')[$i],
                'medium_value'    =>  $this->input('medium_values')[$i]
            ];
        }
        return $media;
    }
    
    public function getMembers() {
        $members = array();
        if($this->has('members')) {
            $members = $this->input('members');
        }
        return $members;
    }
    
    public function getPastMembers() {
        $past_members = array();
        if($this->has('past_members')) {
            $past_members = $this->input('past_members');
        }
        return $past_members;
    }
}