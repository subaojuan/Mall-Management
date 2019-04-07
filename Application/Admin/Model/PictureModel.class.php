<?php

namespace Admin\Model;

use       Think\Model;

class PictureModel extends Model
{


    protected function _before_insert(&$data, $option)
    {


        //判断图像是否上传成功
        if ($_FILES['url']['error'] == 0) {

            // 实例化上传类
            $upload = new \Think\Upload();
            // 设置附件上传大小
            $upload->maxSize = 3145728;
            // 设置附件上传类型
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath = './Public/';

            // 设置附件上传目录 （根目录下的）
            $upload->savePath = './Uploads/';
            // 上传文件
            $info = $upload->upload();

            if (!$info) {
                // 上传错误提示错误信息，把上传的错误信息放到模型类里面
                $this->error = $upload->getError();
                //返回false
                return FALSE;

            } else {
                $path = ltrim($info['url']['savepath'], '\.');
                $a_path = $path . $info['url']['savename'];

                $data['url'] = $a_path;
                $data['first'] = 'n';
            }

        } else {
            $this->error = '轮播图不能为空';
            return FALSE;
        }


    }


}
