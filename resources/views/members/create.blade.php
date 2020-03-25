<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>laravel-base-crud</title>
  </head>
  <body>
    <form class="" action="{{(!empty($member)) ? route('members.update', $member->id) : route('members.store')}}" method="post">
      @csrf
      @if(!empty($member))
        @method('PATCH')
      @else
        @method('POST')
      @endif

      <input type="text" name="name" value="{{(!empty($member)) ? $member->name : ''}}" placeholder="insert name">
      <input type="text" name="phone" value="{{(!empty($member)) ? $member->phone : ''}}" placeholder="insert phone number">
      <input type="date" name="joinDate" value="{{(!empty($member)) ? $member->joinDate : ''}}" placeholder="insert join date">
      <input type="text" name="coach" value="{{(!empty($member)) ? $member->coach : ''}}" placeholder="insert coach name">
      <input type="text" name="team" value="{{(!empty($member)) ? $member->team : ''}}" placeholder="insert team name">
      <input type="text" name="gender" value="{{(!empty($member)) ? $member->gender : ''}}" placeholder="insert gender">

      @if(!empty($member))
        <input type="hidden" name="id" value="{{$member->id}}">
        <input type="submit" name="" value="Save">
      @else
        <input type="submit" name="" value="Save">
      @endif

    </form>

  </body>
</html>
