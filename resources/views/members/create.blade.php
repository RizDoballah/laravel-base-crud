<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>laravel-base-crud</title>
  </head>
  <body>
    <form class="" action="{{route('members.store')}}" method="post">
      @csrf
      <input type="text" name="name" value="" placeholder="insert name">
      <input type="text" name="phone" value="" placeholder="insert phone number">
      <input type="text" name="joinDate" value="" placeholder="insert join date">
      <input type="text" name="coach" value="" placeholder="insert coach name">
      <input type="text" name="team" value="" placeholder="insert team name">
      <input type="text" name="gender" value="" placeholder="insert gender">
      <button type="submit" name="button">Save</button>
      @method('POST')

    </form>

  </body>
</html>
