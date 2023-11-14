<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  @auth
  <p>Вы успешно вошли в свой аккаунт!</p>
  <form action="/logout" method="POST">
    @csrf
    <button>Выйти</button>
  </form>

  <div style="border: 3px solid black;">
    <h2>Создать новый пост</h2>
    <form action="/create-post" method="POST">
      @csrf
      <input type="text" name="title" placeholder="название поста">
      <textarea name="body" placeholder="содержание поста..."></textarea>
      <button>Сохранить</button>
    </form>
  </div>

  <div style="border: 3px solid black;">
    <h2>Все посты</h2>
    @foreach($posts as $post)
    <div style="background-color: gray; padding: 10px; margin: 10px;">

      <h3>{{$post['title']}} by {{$post->user->name}}</h3>
      {{$post['body']}}

      <p><a href="/edit-post/{{$post->id}}">Редактировать</a></p>

      <form action="/delete-post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Удалить</button>
      </form>

    </div>
    @endforeach
  </div>

  @else
  <div style="border: 3px solid black;">
    <h2>Зарегистрируйте ваш аккаунт</h2>
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="имя">
      <input name="email" type="text" placeholder="элекронная почта">
      <input name="password" type="password" placeholder="пароль">
      <button>Зарегистрироваться</button>
    </form>
  </div>
  <div style="border: 3px solid black;">
    <h2>Войдите в ваш аккаунт</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="имя">
      <input name="loginpassword" type="password" placeholder="пароль">
      <button>Войти</button>
    </form>
  </div>
  @endauth


</body>
</html>
