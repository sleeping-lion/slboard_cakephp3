<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Dd helper
 */
class AppHelper extends Helper {
	
	public function activeClass($className,$classonly=false) {
		$return=false;
		if(is_array($className)) {
			if(in_array($this->request->params['controller'],$className)) {
				$return=true;
			} 
		} else {		
			if(!strcmp($this->request->params['controller'],$className)) {
				$return=true;
			}
		}
		
		if($return) {
			if($classonly) {
				return ' active';
			} else {
				return 'class="active"';
			}
		} else {
			return false;
		}
	}	
	
	public function community_link_title($value) {
		$title='';
		if($value['notice']) {
			$title='<span class="focus">[공지]</span>';
		}
		
		if($value['deleted_at']) {						
			$title.='삭제된 게시물입니다.';
		} else {		
			$title.=$value['title'];
		}
		
		if($value['comment_count']) {
			$title.='<span class="comment_count number">['.$value['comment_count'].']</span>';
		}
		
		return $title;
	}
	
	public function tag_cloud(Array $tags,Array $classes) {
		if(!count($tags))
 			return array();
		
		$max_count = $tags[0]['Tag']['taggings_count'];
		foreach($tags as $index=>$value) {
			$c_index = (($value['Tag']['taggings_count'] / $max_count) * (count($classes) - 1));
			$tags[$index]['Tag']['class']=$classes[round($c_index)];
		}
		return $tags;
	}
	
	
	public function checkAnonAuth(Array $content,$modelName,$session) {
		
		if($session->check('Auth.User')) {
			if($content['user_id']==SessionHelper::read('Auth.User.id')) {
				return true;
			}
		} else {
			if($session->check("AnonAuth.{$modelName}.{$content['id']}")) {
				return true;
			}
		}
		return false;
	}
	
	public function getFormatCommentCount($comment_count=0) {
		$return_string='';
		
		if($comment_count) {
			$return_string=' ['.$comment_count.']';
		} 
		
		return $return_string;
	}
	
	public function getOrderLink($paginator,$field,$label=null) {
		$icon='';

		if(isset($_GET['sort'])) {
			if($field==$_GET['sort']) {
				if($_GET['direction']=='desc') {
					$icon='<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
				} else {
					$icon='<span class="glyphicon glyphicon-sort-by-attributes"></span>';
				}
			}
		}
		
		if(empty($label)) {
			$label=__(ucfirst($field));
		}
		
		return $paginator -> sort($field,$label.$icon,array('escape'=>false));
	}
	
	public function pagination($paginator) {
		return $paginator -> numbers(array('before' => '<div class="text-center"><ul class="pagination">', 'separator' => '', 'currentTag' => 'span', 'currentClass' => 'active', 'tag' => 'li', 'after' => '</ul></div>'));
	}	
	
	public function getFormatDate($date, $type = null, $noTodayTime = false) {
		$date1 = explode(' ', $date);
		$date2 = explode('-', $date1[0]);

		switch(intval($type)) {
			case 1 :
				return $date2[0] . '년 ' . $date2[1] . '월';
			case 2 :
				return $date2[0] . '.' . $date2[1];
			case 3 :
				return $date2[0] . '.' . $date2[1] . '.' . $date2[2];
			case 4 :
				return $date2[1] . '-' . $date2[2];
			case 5 :
				$week = date("w", mktime(0, 0, 0, $date2[1], $date2[2], $date2[0]));
				switch($week) {
					case 0 :
						$strWeek = '일';
						break;
					case 1 :
						$strWeek = '월';
						break;
					case 2 :
						$strWeek = '화';
						break;
					case 3 :
						$strWeek = '수';
						break;
					case 4 :
						$strWeek = '목';
						break;
					case 5 :
						$strWeek = '금';
						break;
					case 6 :
						$strWeek = '토';
						break;
				}
				return $date2[1] . '.' . $date2[2] . '(' . $strWeek . ')';
			case 6 :
				return substr($date2[0], 2, 2) . '.' . $date2[1] . '.' . $date2[2];

			default :
				if ($noTodayTime)
					return $date1[0];

				if (mktime(0, 0, 0, date("m"), date("d"), date("Y")) == mktime(0, 0, 0, $date2[1], $date2[2], $date2[0])) {
					return $date1[1];
				} else {
					return $date1[0];
				}
		}
	}	
}
