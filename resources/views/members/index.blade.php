<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>All members</h1>
    @if(!empty($id))
      <div class="alert">
        Hai cancellato il record {{$id}}
      </div>
    @endif

    <div class="members">
      @foreach ($member as $singleMember)
        <div class="member">
          <ul>
            <li>ID: {{$singleMember->id}}</li>
            <li> Name: {{$singleMember->name}}</li>
            <li>Phone: {{$singleMember->phone}}</li>
            <li>Join date: {{$singleMember->joinDtae}}</li>
            <li>Coach: {{$singleMember->coach}}</li>
            <li>Team: {{$singleMember->team}}</li>
            <li>Gneder: {{$singleMember->gender}}</li>
            <li>
              <form class="" action="{{route('members.destroy', $singleMember->id)}}" method="post">
                @csrf
                @method('DElETE')
                <button type="submit" name="button">Delete</button>

              </form>
            </li>
          </ul>

        </div>

      @endforeach

    </div>

  </body>
</html>
