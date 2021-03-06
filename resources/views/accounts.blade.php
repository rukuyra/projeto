@extends('template')
@section('content')
<div class="content">
    
    <div class="tabs-x tabs-above">
        <div id="myTabContent-kv-1" class="tab-content">
            <table class="table table-striped">
                @if(!$accounts == null)
                    <thead>
                        <tr>
                            <th>
                                Id                        
                            </th>
                            <th>
                                Code                        
                            </th>
                            <th>
                                Account Type
                            </th>
                            <th>
                                Current Balance
                            </th>
                        </tr>
                    </thead>
                @endif
                <tbody>
                    @if(Session::has('message'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('message') }}
                    </div>  
                    @endif
                    @if(!$accounts == null)
                        @foreach ($accounts as $key => $account)
                            <tr>
                                <th>{{$account->id}}</th>
                                <th>{{$account->code}}</th>
                                <th>{{$account->account_type->name}}</th>
                                <th>{{$account->current_balance}}</th>
                                <th>
                                    {{ Form::open(array('route' => ['account.{account}', $account->id], 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Remove', array('class' => 'btn btn-warning')) }}
                                    {{ Form::close() }}

                                    <button class="btn btn-small btn-info pull-right" > 
                                    <a href="{{route('account.{account}',$account->id)}}" >Edit</a>
                                    </button>

                                    <button class="btn btn-small btn-success pull-right" > 
                                    <a href="{{route('movements.{account}',$account->id)}}">View Movment</a> 
                                    </button> 

                                    



                                    <a href="{{route('accounts.{user}.opened',Auth::user()->id)}}" class="topicos">
                        <i class="ti-view-list-alt"></i>
                        <p>Accounts open</p>
                    </a>
                                </th>
                                
                            </tr>
                        @endforeach
                    @else
                       <p>Nenhum Registo</p>
                    @endif
                </tbody>
            </table>  
        </div>
    </div>
</div>

@endsection
