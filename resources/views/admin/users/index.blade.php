@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="mb-3">
                    <h3>Listagem Usuários</h3>
                </div>
                {!! \Bootstrapper\Facades\Button::primary('Novo Usuário')->asLinkTo(route('admin.users.create')) !!}

            </div>
        </div>

        <div class="row">
            {!!
             \Bootstrapper\Facades\Table::withContents($users->items())
             ->striped()
             ->callback('Ações', function($field, $model){

                $linkEdit = route('admin.users.edit', ['user' => $model->id]);
                $linkDelete = route('admin.users.destroy', ['user' => $model->id]);
                $linkShow = route('admin.users.show', ['user' => $model->id]);
                $formDelete = \Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                        'id' => 'form-delete' . $model->id,
                        'url' => $linkDelete,
                        'method' => 'DELETE',
                        'style' => 'display:none'
                    ]);
                return \Bootstrapper\Facades\Button::warning('Editar')->asLinkTo($linkEdit) . ' ' .
                \Bootstrapper\Facades\Button::danger('Deletar')->asLinkTo($linkDelete)
                ->addAttributes([
                    'onclick' => "event.preventDefault();document.getElementById(\"form-delete" . $model->id . "\").submit();"
                ]) . form($formDelete);;

             })
             !!}
        </div>
        {!! $users->links() !!}
    </div>
@endsection