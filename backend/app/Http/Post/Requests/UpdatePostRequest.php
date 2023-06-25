<?php

namespace App\Http\Post\Requests;

use App\Domains\Post\DataTransferObjects\CreatePostDTO;
use App\Domains\Post\DataTransferObjects\UpdatePostDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest{

    public function autorize() {
        return true;
    }

    public function rules() {
        return [
            "title" => "min:5|max:50",
            "content" => "min:20"
        ];
    }

    public function getUpdatePostDTO(): UpdatePostDTO
    {
        $params = $this->all();
        $params['id'] = $this->route('id');
        return UpdatePostDTO::fromArray($params);
    }

}
