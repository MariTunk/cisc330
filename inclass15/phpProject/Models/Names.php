<?php

namespace phpProject\Models;


class User {
    public function getAllUsersByName($params) {

        $allUsers = 
        [
              [
                'Guest' => '1',
                'name' => 'Aminah',
               ],
               [
                 'Guest' => '2',
                 'name' => 'Nathan'
               ],
               [
                 'Guest' => '3',
                 'name' => 'Mariyam'
               ],  
        ];

        if (!empty($params['name'])) {
            return array_filter($allUsers, function ($user) use ($params) {
                if (str_contains(strtolower($user['name']), $params['name'])) {
                    return $user;
                };
                return null;
            });
        }

        return $allUsers;
    }
}
