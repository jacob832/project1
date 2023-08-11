@include('user.navigation')
<br><br><br><br><br><br><br>
@if($users)
<div class="card">
    <div class="card-body">
        <div class="card-content">
            <div class="user-image">
            @if ($users->image_url)
                  <img src="{{ $users->image_url }}" alt="User Image">
          @else
                <img src="{{ asset('/images/default.png') }}" alt="Default Image">
         @endif
            </div>
            <div class="user-details">
                <p>Name: {{ $users->name }}</p>
                <p>Gender: {{ $users->gender }}</p>
                <p>Phone Number: {{ $users->phone_number }}</p>
                <p>Birth: {{ $users->birth }}</p>
            </div>
        </div>
    </div>
</div>

@else
    <p>No user data available.</p>
@endif

<br><br><br><br><br><br><br><br><br>
@include('user.down')
