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
            'past_members'  => 'nullable'
        ];
    }
    
    public function getArtist() {
        return (object) [
            'name'        => $this->input('name'),
            'year_started'=> $this->input('year_started'),
            'year_quit'   => $this->input('year_quit'),
            'members'     => $this->input('members'),
            'past_members'=> $this->input('past_members'),
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
                'medium_type_id'  =>  $this->input("medium_types")[$i],
                'medium_value'    =>  $this->input("medium_values")[$i]
            ];
        }
        return $media;
    }
}