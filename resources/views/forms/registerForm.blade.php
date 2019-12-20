@if(Session::has('status'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(["id" => "registerForm", "url" => "/register", 'files' => true]) }}
    <?= Form::text('name', '', ['required' => true]); ?>
    <?= Form::text('surname', '', ['required' => true]); ?>
    <?= Form::date('birth-date', 'dd/mm/yyyy', ['required' => true, 'class' => 'js_datepicker']); ?>
    <?= Form::file('image', ["accept" => 'image/jpeg , image/jpg, image/png']); ?>
 <?= Form::submit('Submit'); ?>
{{ Form::close() }}
