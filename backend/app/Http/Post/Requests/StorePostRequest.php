<?php

namespace App\Http\Post\Requests;

use App\Domains\Post\DataTransferObjects\CreatePostDTO;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest{

    public function autorize() {
        return true;
    }

    public function rules() {
        return [
            "title" => "required|min:5|max:50",
            "content" => "required|min:20"
        ];
    }

    public function getCreatePostDTO(): CreatePostDTO
    {
        return CreatePostDTO::fromArray($this->all());
    }

}
