<?php
/**
 * 把原始图片按照较大宽度的一边生成正方形图片 (左右或上下留白)
 * @author Shenjie <shenjieyouxiang@163.com>
 * @date 2016-08-18
 * 
 * 调用方式：SquareImage::generateImage('路径');
 */
class SquareImage {
	/**
	 * 生成正方形图片 (左右或上下留白)
	 * @param string $src_path 图片原始路径
	 * @param string $dst_path 图片存放路径
     * @param string $dst_name 目标图片名称 （为空时则是原图片名称,若为同一路径则会覆盖原始图片！！！）
	 * @return bool | resource
	 */
	public static function generateImage($src_path, $dst_path, $dst_name = '') {
		if (empty($src_path) || empty($dst_path)) {
			return false;
        }
		$src = imagecreatefromstring(file_get_contents($src_path));
		$size_src = getimagesize($src_path);
		$src_w = $size_src['0'];
		$src_h = $size_src['1'];
		if ($src_w > $src_h) {
			$dst_x = 0;
			$dst_y = ($src_w - $src_h) / 2;
			$max = $src_w;
		} else {
			$dst_x = ($src_h - $src_w) / 2;
			$dst_y = 0;
			$max = $src_h;
		}
		$dst = imagecreatetruecolor($max, $max);
		$background_color = imagecolorallocate($dst, 255, 255, 255);
		imagefill($dst, 0, 0, $background_color);
		imagecopymerge($dst, $src, $dst_x, $dst_y, 0, 0, $src_w, $src_h, 100);
		$new_file = $dst_name ? $dst_path . $dst_name : $dst_path . basename($src_path);
		imagejpeg($dst, $new_file);
		imagedestroy($dst);
		return $new_file;
	}
}

$src_path = 'test.jpg';
$dst_path = '../';
$dst_name = '';
$file = SquareImage::generateImage($src_path, $dst_path, $dst_name);
var_dump($file);
