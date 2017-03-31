<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-27
 * Time: 18:11
 */
namespace App\Exceptions;

class Message
{
    //通用
    const SUCCESS = '成功';
    const DATA_EXISTS = '数据已存在';
    const DATA_NOT_EXISTS = '数据不存在';
    const DATA_TYPE_ERROR = '数据类型错误';
    const DATA_ASSOCIATED_LOSS = '缺少关联数据';
    const TOKEN_ERROR = 'Token错误';
    const TOKEN_EXPIRE = 'Token过期';
    const DELETE_SUCCESS = '删除成功';
    const ADD_SUCCESS = '添加成功';
    const UPDATA_SUCCESS = '更新成功';

    //用户相关
    const USER_PASS_SUCCESS = '用户验证成功';
    const PASSWORD_ERROR = '密码不正确';
    const VERIFY_CODE_ERROE = '验证码不正确';

    //报名相关
    const INFO_MODIFY_SUCCESS = '报名信息修改成功';
    const INFO_MODIFY_FAILED = '报名信息修改失败';

    const REQUEST_NOT_FOUND = '请求找不到';
    const UNKNOWN = '未知错误(自定义)';

    //公司内部通用
    const INTERNAL_ERROR = '内部错误';
    const OUT_OF_SERVICE = '停止服务';
    const UNDEFINED_SERVICE = '未知服务';
    const SERVER_BUSY = '服务器忙碌';
    const SERVER_COMMUNICATION_ERROR = '服务器通讯错误';
    const PARAMETER_ERROR = '参数错误';
    const VALIDATE_ERROR = '验证错误';
    const NO_PRIVILEGE = '没有权限';
    const RESERVED = '保留';
    const APPKEY_VERIFY_ERROR = 'APPKEY验证失败';
    const VIOLATE_POLICY = '违反政策';
    const USER_NOT_EXISTS = '用户不存在';
    const USER_ALREADY_EXISTS = '用户已存在';
    const BP_NOT_EXISTS = 'BP不存在';
    const BP_ALREADY_EXISTS = 'BP已存在';
}