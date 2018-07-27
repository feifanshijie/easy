<?php

namespace Bin;

final class AES
{
    /**
     * Token加密秘钥
     */
    const KEY = "1234567890123456";

    /**
     * Token加密偏移量
     */
    const IV = "1234567812345678";

    /**
     * 加密 AES-CBC-128(加密后将数据base64编码)
     * @param string $data
     * @return string
     */
    public final static function encrypt(string $data = null) : string
    {
        return base64_encode(openssl_encrypt($data, "AES-128-CBC", self::KEY, 1, self::IV));
    }

    /**
     * 解密 AES-CBC-128(先将数据base64解码再解密)
     * @param string $data
     * @return string
     */
    public final static function decrypt(string $data = null) : string
    {
        return openssl_decrypt(base64_decode($data), "AES-128-CBC", self::KEY, 1, self::IV);
    }

    /**
     * 生成Token
     * @param int|null $member_id
     * @return string|int
     */
    public final static function create(int $member_id = null)
    {
        if(null != $member_id)
        {
            $new_token_info['expiration'] = time() + 1200;
            $new_token_info['member_id'] = $member_id;
            $new_token_info['member_key'] = md5($new_token_info['expiration'].'|||'.$member_id);
            return self::encrypt(json_encode($new_token_info));
        }

        return 0;

//        $time = time();
//
//        $token_info = json_encode([
//            'created_at' => $time,
//            'member_id' => $member_id,
//            'unique' => md5($time.'@'.$member_id)
//        ]);
//
//        $token = self::encrypt($token_info);
//
//        (new Client())->setex('USER:'.$member_id, self::CACHE_TIME, $token_info);
//
//        return $token;
    }

    /**
     * 验证Token
     * @param string|null $token
     * @return int|string
     */
    public final static function get(string $token = null)
    {
        if(null != $token)
        {
            $token_info = json_decode(self::decrypt($token), 1);
            if(isset($token_info['expiration']) && $token_info['expiration'] > time())
            {
                $new_token_info['expiration'] = time() + 1200;
                $new_token_info['member_id'] = $token_info['member_id'];
                $new_token_info['member_key'] = md5($new_token_info['expiration'].'|||'.$token_info['member_id']);
                return $token_info;
            }
        }

        return 0;
    }
}
