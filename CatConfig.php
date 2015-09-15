<?php
/**
 * Human configure me NAOW!
 */
class CatConfig {
	/**
	 * Map of status codes found in the $statusFile and corresponding pictures to show in form
	 * <status_code> => [
	 * 		'img' => '<cat_img_url>',
	 * 		'txt' => '<status_will_be_shown_in_title>',
	 * ]
	 * Note: status code can be anything, but if it's a string, it needs to be enclosed in single or double quotes
	 * Also: if the status code is a number, PHP will automatically convert it into an integer, but be aware of the
	 * mechanics: http://php.net/manual/en/language.types.string.php#language.types.string.conversion
	 *
	 * @var array
	 */
	public $catMap = [
		0 => [ // All good
			'img' => 'http://stylestodo.com/wp-content/uploads/2015/08/happy_cat_wallpaper.jpg',
			'txt' => 'Happy cat, human go keep calm and go carry on',
		],
		1 => [ // Test broken
			'img' => 'http://cdn.meme.am/instances/58382798.jpg',
			'txt' => 'Test cat broken, human tester go fix',
		],
		2 => [ // Prod broken
			'img' => 'http://33.media.tumblr.com/tumblr_kpzovz4Zyv1qzcamuo1_400.gif',
			'txt' => 'Prod cat broken, human go panic',
		],
		3 => [ // Connection problem
			'img' => 'http://2.bp.blogspot.com/-1rSLcACu23U/UpvVkeMB9II/AAAAAAAAH5Y/e7dgIq9V-4o/s1600/needCord1.jpg',
			'txt' => 'Unplugged cat, human go fix Nagios',
		],
	];

	/**
	 * This will be used if the status file is missing, cannot be read, contains status not listed in the $catMat
	 * or any other internal problem.
	 *
	 * @var array
	 */
	public $errorCat = 'http://2.bp.blogspot.com/_xgEWICjIuNM/TRBbYERDeiI/AAAAAAAAAJw/k_ay9PvOvs8/s1600/internal-server-error.jpg';

	/**
	 * You can use URLs here, or filesystem paths
	 *
	 * @var string
	 */
	public $statusCatFile = './status.cat';

}