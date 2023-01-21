<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="/css/reset.css">
</head>
<style>
  :root {
    --btn-color-logout: #ff0000;
    --btn-color-add: #dc70fa;
    --btn-color-update: #fa9770;
    --btn-color-delete: #71fadc;
    --btn-color-common: #fff;
    --bg-card-common: #fff;
  }

  th {
    text-align: center;
  }

  p {
    display: inline;
  }

  .container {
    background-color: #2d197c;
    height: 100vh;
    width: 100vw;
    margin: 0;
    position: relative;
  }

  .card {
    width: 50vw;
    border-radius: 10px;
    background-color: var(--bg-card-common);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 30px;
  }

  .card__header {
    display: flex;
    justify-content: space-between;
  }

  .card__title {
    font-size: 24px;
    font-weight: bold;
  }

  .todo__create {
    margin: 14px 0;
  }

  .todo__create--form {
    display: flex;
    justify-content: space-between;
  }

  .content__common {
    border: 1px #ccc solid;
    border-radius: 5px;
    appearance: none;
    padding: 5px;
    font-size: 14px;
  }

  .content__add {
    width: 75%;
  }

  .content__update {
    width: 90%;
  }

  .select__tag {
    border: 1px #ccc solid;
    border-radius: 5px;
    padding: 5px;
    font-size: 14px;
  }

  .button__common {
    border: 2px black solid;
    background-color: var(--bg-card-common);
    border-radius: 5px;
    padding: 8px 16px;
    font-size: 12px;
    font-weight: bold;
    transition: .4s;
    text-align: left;
    cursor: pointer;
  }

  .button__logout {
    margin-left: 5px;
    border-color: var(--btn-color-logout);
    color: var(--btn-color-logout);
    white-space: nowrap;
  }

  .button__logout:hover {
    background-color: var(--btn-color-logout);
    color: var(--btn-color-common);
    transition: .4s;
  }

  .button__add {
    border-color: var(--btn-color-add);
    color: var(--btn-color-add);
    white-space: nowrap;
  }

  .button__add:hover {
    background-color: var(--btn-color-add);
    color: var(--btn-color-common);
    transition: .4s;
  }

  .button__update {
    border-color: var(--btn-color-update);
    color: var(--btn-color-update);
  }

  .button__update:hover {
    background-color: var(--btn-color-update);
    color: var(--btn-color-common);
    transition: .4s;
  }

  .button__delete {
    border-color: var(--btn-color-delete);
    color: var(--btn-color-delete);
  }

  .button__delete:hover {
    background-color: var(--btn-color-delete);
    color: var(--btn-color-common);
    transition: .4s;
  }

  .todo__list {
    margin-top: 30px;
  }

  table {
    text-align: center;
    width: 100%;
  }

  tr {
    height: 50px;
  }
</style>

<body>
  <div class="container">
    <div class="card">
      <div class="card__header">
        <p class="card__title">@yield('title')</p>
        <div class="user__form">
          @if (Auth::check())
          <p>{{'「'. $user->name . '」でログイン中'}}</p>
          <form action="{{ route('logout') }}" style="display: inline;" method="post">
            @csrf
            <button class="button__common button__logout">ログアウト</button>
          </form>
          @endif
        </div>
      </div>
      <div>
        @yield('button__find')
      </div>
      <div class="todo__create">
        @yield('todo__action')
      </div>
      <table class="todo__list">
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>タグ</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach ($todos as $todo)
        <tr>
          <td>{{$todo->created_at}}</td>
          <form action="/todo/update?id={{$todo->id}}" method="post">
            @csrf
            <td>
              <input class="content__common content__update" type="text" name="content" value="{{$todo->content}}">
            </td>
            <td>
              <select class="select__tag" name="tag_id">
                @foreach ($tags as $tag)
                @if ($tag->id == $todo->tag_id)
                <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                @else
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endif
                @endforeach
              </select>
            </td>
            <td>
              <button class="button__common button__update">更新</button>
            </td>
          </form>
          <td>
            <form action="/todo/delete?id={{$todo->id}}" method="post">
              @csrf
              <button class="button__common button__delete">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
      <div class="card__footer">
        @yield('card__footer')
      </div>
    </div>
  </div>
</body>

</html>