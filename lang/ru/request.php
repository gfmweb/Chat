<?php

return [
    'required' => 'Поле :attribute обязательно должно быть заполнено',
    'string' => 'Поле :attribute должно быть строкой',
    'email' => 'Поле :attribute должно быть действительным email адресом',
    'confirmed' => 'Поле :attribute должно быть подтверждено',
    'numeric' => 'Поле :attribute должно быть числом',
    'min' => 'Поле :attribute должно быть больше :value',
    'login' => [
        'exists' => 'Неверное имя пользователя или пароль',
    ],
    'register' => [
        'unique' => 'Этот email уже зарегистрирован',
        'name' => [
            'string' => 'Имя и Фамилия могут быть только строкой',
            'min' => 'Поле :attribute не может быть таким коротким',
            'max' => 'Поле :attribute слишком длинное',
        ],
    ],
    'createChat' => [
        'exists' => 'Такой пользователь не найден в системе'
    ],
    'throttle' => [
        'tooMany' => 'Превышено максимальное количество запросов в секунду'
    ]
];