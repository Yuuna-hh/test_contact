<?php

return [

    'accepted'             => ':attributeを承認してください。',
    'accepted_if'          => ':otherが:valueの場合、:attributeを承認してください。',
    'active_url'           => ':attributeは有効なURLではありません。',
    'after'                => ':attributeには、:date以降の日付を指定してください。',
    'after_or_equal'       => ':attributeには、:date以降の日付を指定してください。',
    'alpha'                => ':attributeはアルファベットのみが使用できます。',
    'alpha_dash'           => ':attributeは英数字とハイフン、アンダースコアのみが使用できます。',
    'alpha_num'            => ':attributeは英数字のみが使用できます。',
    'array'                => ':attributeは配列でなければなりません。',
    'before'               => ':attributeは:date以前の日付でなければなりません。',
    'before_or_equal'      => ':attributeは:date以前の日付でなければなりません。',
    'between'              => [
        'array'   => ':attributeは:min〜:max個でなければなりません。',
        'file'    => ':attributeは:min〜:max KBのファイルでなければなりません。',
        'numeric' => ':attributeは:min〜:maxの間でなければなりません。',
        'string'  => ':attributeは:min〜:max文字でなければなりません。',
    ],
    'boolean'              => ':attributeはtrueかfalseを指定してください。',
    'confirmed'            => ':attributeと確認が一致していません。',
    'current_password'     => 'パスワードが正しくありません。',
    'date'                 => ':attributeは有効な日付ではありません。',
    'date_equals'          => ':attributeは:dateと同じ日付でなければなりません。',
    'date_format'          => ':attributeが:format形式と一致しません。',
    'declined'             => ':attributeは拒否する必要があります。',
    'declined_if'          => ':otherが:valueの場合、:attributeは拒否する必要があります。',
    'different'            => ':attributeと:otherは異なる必要があります。',
    'digits'               => ':attributeは:digits桁でなければなりません。',
    'digits_between'       => ':attributeは:min〜:max桁でなければなりません。',
    'dimensions'           => ':attributeの画像サイズが無効です。',
    'distinct'             => ':attributeに重複した値があります。',
    'email'                => ':attributeは有効なメールアドレス形式で指定してください。',
    'ends_with'            => ':attributeは次のいずれかで終わる必要があります: :values',
    'enum'                 => '選択された:attributeが無効です。',
    'exists'               => '選択された:attributeは存在しません。',
    'file'                 => ':attributeはファイルでなければなりません。',
    'filled'               => ':attributeは値を指定してください。',
    'gt'                   => [
        'array'   => ':attributeは:value個より多くなければなりません。',
        'file'    => ':attributeは:value KBより大きい必要があります。',
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'string'  => ':attributeは:value文字より多くなければなりません。',
    ],
    'gte'                  => [
        'array'   => ':attributeは:value個以上でなければなりません。',
        'file'    => ':attributeは:value KB以上でなければなりません。',
        'numeric' => ':attributeは:value以上でなければなりません。',
        'string'  => ':attributeは:value文字以上でなければなりません。',
    ],
    'image'                => ':attributeは画像でなければなりません。',
    'in'                   => '選択された:attributeは無効です。',
    'in_array'             => ':attributeが:otherに存在しません。',
    'integer'              => ':attributeは整数でなければなりません。',
    'ip'                   => ':attributeは有効なIPアドレスを指定してください。',
    'ipv4'                 => ':attributeは有効なIPv4アドレスを指定してください。',
    'ipv6'                 => ':attributeは有効なIPv6アドレスを指定してください。',
    'json'                 => ':attributeは有効なJSON文字列でなければなりません。',
    'lt'                   => [
        'array'   => ':attributeは:value個より少なくなければなりません。',
        'file'    => ':attributeは:value KBより小さい必要があります。',
        'numeric' => ':attributeは:valueより小さくなければなりません。',
        'string'  => ':attributeは:value文字より少なくなければなりません。',
    ],
    'lte'                  => [
        'array'   => ':attributeは:value個以下でなければなりません。',
        'file'    => ':attributeは:value KB以下でなければなりません。',
        'numeric' => ':attributeは:value以下でなければなりません。',
        'string'  => ':attributeは:value文字以下でなければなりません。',
    ],
    'mac_address'          => ':attributeは有効なMACアドレスでなければなりません。',
    'max'                  => [
        'array'   => ':attributeは:max個以下でなければなりません。',
        'file'    => ':attributeは:max KB以下でなければなりません。',
        'numeric' => ':attributeは:max以下でなければなりません。',
        'string'  => ':attributeは:max文字以下でなければなりません。',
    ],
    'mimes'                => ':attributeは:valuesタイプのファイルでなければなりません。',
    'mimetypes'            => ':attributeは:valuesタイプのファイルでなければなりません。',
    'min'                  => [
        'array'   => ':attributeは:min個以上でなければなりません。',
        'file'    => ':attributeは:min KB以上でなければなりません。',
        'numeric' => ':attributeは:min以上でなければなりません。',
        'string'  => ':attributeは:min文字以上でなければなりません。',
    ],
    'multiple_of'          => ':attributeは:valueの倍数でなければなりません。',
    'not_in'               => '選択された:attributeは無効です。',
    'not_regex'            => ':attributeは無効な形式です。',
    'numeric'              => ':attributeは数値でなければなりません。',
    'password'             => 'パスワードが誤っています。',
    'present'              => ':attributeが存在していなければなりません。',
    'prohibited'           => ':attributeは禁じられています。',
    'prohibited_if'        => ':otherが:valueの場合、:attributeは禁じられています。',
    'prohibited_unless'    => ':otherが:valueでない限り、:attributeは禁じられています。',
    'prohibits'            => ':attributeは:otherの存在を禁じます。',
    'regex'                => ':attributeは無効な形式です。',
    'required'             => ':attributeは必ず指定してください。',
    'required_array_keys'  => ':attributeには:valuesを含める必要があります。',
    'required_if'          => ':otherが:valueの場合、:attributeは必ず指定してください。',
    'required_unless'      => ':otherが:valueでない限り、:attributeは必ず指定してください。',
    'required_with'        => ':valuesが存在する場合、:attributeは必ず指定してください。',
    'required_with_all'    => ':valuesが存在する場合、:attributeは必ず指定してください。',
    'required_without'     => ':valuesが存在しない場合、:attributeは必ず指定してください。',
    'required_without_all' => ':valuesが存在しない場合、:attributeは必ず指定してください。',
    'same'                 => ':attributeと:otherは一致しなければなりません。',
    'size'                 => [
        'array'   => ':attributeは:size個でなければなりません。',
        'file'    => ':attributeは:size KBでなければなりません。',
        'numeric' => ':attributeは:sizeでなければなりません。',
        'string'  => ':attributeは:size文字でなければなりません。',
    ],
    'starts_with'          => ':attributeは次のいずれかで始まる必要があります: :values',
    'string'               => ':attributeは文字列でなければなりません。',
    'timezone'             => ':attributeは正しいタイムゾーンを指定してください。',
    'unique'               => ':attributeの値は既に使用されています。',
    'uploaded'             => ':attributeのアップロードに失敗しました。',
    'url'                  => ':attributeは有効なURLを指定してください。',
    'uuid'                 => ':attributeは有効なUUIDでなければなりません。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    */
    'custom' => [
        'email' => [
            'required' => 'メールアドレスを入力してください。',
            'email' => 'メールアドレスはメール形式で入力してください。',
        ],
        'password' => [
            'required' => 'パスワードを入力してください。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */
    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'name' => 'お名前',
    ],

];