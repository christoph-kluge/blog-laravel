<?php namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{

  /**
   * @return \View
   */
  public function index()
  {
    $posts = Post::where('published_at', '<=', Carbon::now())
      ->orderBy('published_at', 'desc')
      ->paginate(config('blog.posts_per_page'));

    return view('blog.index', compact('posts'));
  }

  /**
   * @param $slug
   * @return \View
   */
  public function showPost($slug)
  {
    $post = Post::whereSlug($slug)->firstOrFail();

    return view('blog.post')->withPost($post);
  }

  /**
   * @param $slug
   * @return \View
   */
  public function editPost($slug)
  {
    /** @var Post $post */
    $post = Post::whereSlug($slug)->firstOrFail();

    if (\Request::method() == 'POST') {
      $data      = \Request::only(['title', 'content', 'published_at']);
      $validator = $this->validator($data);
      if ($validator->failed()) {
        return view('blog.post-edit')
          ->withPost($post)
          ->withErrors($validator->getMessageBag());
      }

      $post->fill($data);
      $post->save();

      return redirect(route('post-edit', ['slug' => $post->slug]));
    }

    return view('blog.post-edit')->withPost($post);
  }

  /**
   * @return mixed
   */
  public function newPost()
  {
    $post = new Post();

    return view('blog.post-new')->withPost($post);
  }

  /**
   * @return mixed
   */
  public function insertPost()
  {
    $data      = \Request::only(['title', 'content', 'published_at']);
    $validator = $this->validator($data);
    if ($validator->failed()) {
      var_dump('error on validation');
    }

    $post = $this->create($data);

    return redirect(route('post', ['slug' => $post->slug]));
  }

  /**
   * @param  array $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return \Validator::make(
      $data, [
        'title'        => 'required|max:255',
        'content'      => 'required|string',
        'published_at' => 'datetime',
      ]
    );
  }

  /**
   * @param  array $data
   * @return Post
   */
  protected function create(array $data)
  {
    return Post::create(
      [
        'title'        => $data['title'],
        'content'      => $data['content'],
        'published_at' => $data['published_at'],
      ]
    );
  }
}
