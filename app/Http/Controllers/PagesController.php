<?php 
namespace App\Http\Controllers;

use Illuminate\http\Request;
use App\htttp\Requests;
use View;
use GuzzleHttp\Client;

class PagesController extends Controller
{	
	public function index() {
		$client = new Client();

		/** Movies */
		$m_upcoming = $client->get('https://api.themoviedb.org/3/movie/upcoming', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		$m_popular = $client->get('https://api.themoviedb.org/3/movie/popular', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		$m_top_rated = $client->get('https://api.themoviedb.org/3/movie/top_rated', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		$m_now_playing = $client->get('https://api.themoviedb.org/3/movie/now_playing', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		/** TV */
		$t_airing_today = $client->get('https://api.themoviedb.org/3/tv/airing_today', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		$t_popular = $client->get('https://api.themoviedb.org/3/tv/popular', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		$t_top_rated = $client->get('https://api.themoviedb.org/3/tv/top_rated', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		/**  Get video by ID*/
		$movie_video = array();
		$json_popular = json_decode($m_popular)->results;
		foreach ($json_popular as $items) {
			$video = $client->get('https://api.themoviedb.org/3/movie/'.$items->id.'/videos', [
				'form_params'	=> [
					'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
				]
			])->getBody();
			$list = json_decode($video)->results;
			foreach ($list as $item) {
				$data = array(
					'key' => $item->key,
					'title' => $items->title,
					'backdrop_path' => $items->backdrop_path
				);
				$movie_video[] = $data;
				break;
			}
		}

		/** Get celebrities */
		$celebrities = $client->get('https://api.themoviedb.org/3/person/popular', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		/** Get genres */
		/*$celebrities = $client->get('https://api.themoviedb.org/3/person/popular', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();*/

		return view('blade.home')
			->with(array(
				'baseurl'		=>	url('http://127.0.0.1:8000'),
				'm_upcoming'	=>	json_encode(json_decode($m_upcoming)->results),
				'm_popular'		=>	json_encode($json_popular),
				'm_top_rated'	=>	json_encode(json_decode($m_top_rated)->results),
				'm_now_playing'	=>	json_encode(json_decode($m_now_playing)->results),
				't_airing_today'=>	json_encode(json_decode($t_airing_today)->results),
				't_popular'		=>	json_encode(json_decode($t_popular)->results),
				't_top_rated'	=>	json_encode(json_decode($t_top_rated)->results),
				'movie_video'	=>	json_encode($movie_video),
				'celebrities'	=>	json_encode(json_decode($celebrities)->results)
			));
	}
}
?>