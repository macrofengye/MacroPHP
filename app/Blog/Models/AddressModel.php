<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/26
 * Time: 19:52
 */

namespace Blog\Models;


use Core\Model\Model;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class AddressModel extends Model
{
    /**
     * 数据库表名
     *
     * @var string
     */
    protected $table = 'address';

    /**
     * 验证规则
     *
     * @var array
     */
    protected $rules = [
        'address' => [
            /*'NotBlank' => ['message' => 'address不能为空'],
            'Length' => [
                'min' => 8,
                'max' => 16,
                'minMessage' => '不能少于8',
                'maxMessage' => '不能大于16'
            ],
            'Email' => [
                'message' => "The email '{{ value }}' is not a valid email.",
                'checkMX' => true
            ],
            'Regex' => [
                'pattern' => "/\d/",
                'match' => false,
                'message' => "Your name cannot contain a number"
            ],*/
            'Callback' => ['Core\Utils\FuncUtils', 'validate'],

            /*'ContainsAlphanumeric'=>[
                'message'=>'mmkk'
            ]*/
        ],
    ];

    public function __construct()
    {
        $this->app = app();
        $this->validateObj = $this->app->entity('address');
        $this->validateObj->setAddress('aaaaaa@qq.com');
        print_r($this->validateObj);
    }
}