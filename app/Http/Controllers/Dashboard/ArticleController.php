<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\voteRequest;
use Storage;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect, Input, Response;
use App\chebao_article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }
    
    public function add()
    {
        return view('admin.article.articleadd');
    } 
    
    public function edit($id)
    {
        return view('admin/article/edit')->withArticle(Article::find($id));
    }

    public function create(Request $request) // Laravel 的依赖注入系统会自动初始化我们需要的 Request 类
    { 
        // 数据验证
      $validator = Validator::make($request->all(),  [
            'title' => 'required|max:255', // 必填、在 articles 表中唯一、最大长度 255
            'source'=> 'required',
            'category'=>'required',
            'content' => 'required', // 必填
        ]);
        if ($validator->passes()){
         $chebao_article = new chebao_article; // 初始化 Article 对象
         $chebao_article->title = $request->get('title'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
         $chebao_article->content = $request->get('content'); // 同上
         $chebao_article->source = $request->get('source'); // 同上
         $chebao_article->category = $request->get('category'); // 同上
         $chebao_article->author = $request->get('author'); // 同上
         $chebao_article->user_id = $request->user()->id; // 获取当前 Auth 系统中注册的用户，并将其 id 赋给 article 的 user_id 属性
        
        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($chebao_article->save()) {
           return Response::json(
            [
                'success' => true,
                'msg' => "文章添加成功",
                'status' => '200'
            ]
        );
        }else{
             return Response::json(
            [
                'success' => false,
                'msg' => "添加失败",
                'status' => '300'
            ]
        );
        }
        }else {
           return Response::json(
            [
                'success' => false,
                'msg' => "数据未通过验证",
                'status' => '500'
            ]
            );
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles,title,'.$id.'|max:255',
            'body' => 'required', 
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }


    public function upimg(Request $request){
       $fi = Request::file('file');
       
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($fi->getClientOriginalExtension() && !in_array($fi->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }
        $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
        $extension = $fi->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $fi->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);
      
          

}
    
    
}
