@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Novo usuário</h3>
                {!!
                form($form->add('insert', 'submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => 'Cadastrar'
                ]))
                !!}
            </div>
        </div>
    </div>
@endsection