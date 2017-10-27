<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Значение :attribute должно быть принятым.',
    'active_url'           => 'Значение :attribute не валидный URL.',
    'after'                => 'Значение :attribute должно быть позже :date.',
    'alpha'                => 'Значение :attribute должно содержать только буквы.',
    'alpha_dash'           => 'Значение :attribute должно содержать только буквы, цифры и подчёркивания.',
    'alpha_num'            => 'Значение :attribute должно содержать только буквы и цифры.',
    'array'                => 'Значение :attribute должно быть массивом.',
    'before'               => 'Значение :attribute должно быть раньше :date.',
    'between'              => [
        'numeric' => 'Значение :attribute должно быть между :min и :max.',
        'file'    => 'Значение :attribute должно быть размером от :min и :max килобайт.',
        'string'  => 'Значение :attribute должно быть длиной от :min и :max символов.',
        'array'   => 'Значение :attribute должно иметь от :min до :max елементов.',
    ],
    'boolean'              => 'Поле :attribute должно быть true или false.',
    'confirmed'            => 'Значение :attribute не совпадает с подтверждением.',
    'date'                 => 'Значение :attribute не правильная дата.',
    'date_format'          => 'Значение :attribute не соответствует формату :format.',
    'different'            => 'Значения :attribute и :other должны отличаться.',
    'digits'               => 'Значение :attribute должно состоять из :digits цифр.',
    'digits_between'       => 'Значение :attribute должно быть длиной от :min до :max цифр.',
    'dimensions'           => 'Значение :attribute имеет неправильное измерение для изображения.',
    'distinct'             => 'Поле :attribute повторяется.',
    'email'                => 'Значение :attribute должно быть правильным email адресом.',
    'exists'               => 'Выбранное значение :attribute неправильное.',
    'file'                 => 'Значение :attribute должно быть файлом',
    'filled'               => 'Поле :attribute обязательно.',
    'image'                => 'Значение :attribute должно быть картинкой.',
    'in'                   => 'Выбранное значение :attribute неправильное.',
    'in_array'             => 'Поле :attribute не существует в :other.',
    'integer'              => 'Значение :attribute должно быть целымм числом.',
    'ip'                   => 'Значение :attribute должно быть валидным IP адресом.',
    'json'                 => 'Значение :attribute должно быть валидной JSON строкой.',
    'max'                  => [
        'numeric' => 'Значение :attribute не должно быть больше чем :max.',
        'file'    => 'Значение :attribute не должно быть больше чем :max килобайт.',
        'string'  => 'Значение :attribute не должно быть больше чем :max символов.',
        'array'   => 'Значение :attribute не должно иметь больше чем :max елементов.',
    ],
    'mimes'                => 'Значение :attribute должно быть a file of type: :values.',
    'mimetypes'            => 'Значение :attribute должно быть a file of type: :values.',
    'min'                  => [
        'numeric' => 'Значение :attribute должно быть как минимум :min.',
        'file'    => 'Значение :attribute должно быть как минимум :min килобайт.',
        'string'  => 'Значение :attribute должно быть как минимум из :min символов.',
        'array'   => 'Значение :attribute должно иметь как минимум :min елементов.',
    ],
    'not_in'               => 'Выбранное значение :attribute неправильное.',
    'numeric'              => 'Поле :attribute должно быть числом.',
    'present'              => 'Поле :attribute должно быть указано.',
    'regex'                => 'Формат :attribute неправильный.',
    'required'             => 'Поле :attribute обязательно.',
    'required_if'          => 'Поле :attribute обязательно если есть :other в :value.',
    'required_unless'      => 'Поле :attribute обязательно если нет :other в :values.',
    'required_with'        => 'Поле :attribute обязательно когда есть :values.',
    'required_with_all'    => 'Поле :attribute обязательно когда есть хоть одно :values.',
    'required_without'     => 'Поле :attribute обязательно когда нет :values.',
    'required_without_all' => 'Поле :attribute обязательно когда нет ни одного :values.',
    'same'                 => 'Значения :attribute и :other должны совпадать.',
    'size'                 => [
        'numeric' => 'Значение :attribute должно быть :size.',
        'file'    => 'Значение :attribute должно быть :size килобайт.',
        'string'  => 'Значение :attribute должно быть :size символов.',
        'array'   => 'Значение :attribute должно содержать :size елементов.',
    ],
    'string'               => 'Значение :attribute должно быть строкой.',
    'timezone'             => 'Значение :attribute должно быть правильной зоной.',
    'unique'               => 'Значение :attribute уже занято.',
    'uploaded'             => 'Невозможно загрузить :attribute.',
    'url'                  => 'Формат :attribute неправильный.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
