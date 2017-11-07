@extends('layouts.app')

@section('title', trans('subscription.edit'))

@section('content')
<div class="row"><br>
    <div class="col-md-4">
        {!! Form::model($subscription, ['route'=>['subscriptions.update', $subscription->id], 'method' => 'patch']) !!}
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">{{ $subscription->domain_name }} <small>{{ trans('subscription.edit') }}</small></h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        {!! FormField::text('name',['label'=> trans('subscription.name')]) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! FormField::price('price',['label'=> trans('subscription.price')]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        {!! FormField::text('start_date',['label'=> trans('subscription.start_date')]) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! FormField::text('due_date',['label'=> trans('subscription.due_date')]) !!}
                    </div>
                </div>
                {!! FormField::select('project_id', $projects,['label'=> trans('subscription.project')]) !!}
                {!! FormField::select('vendor_id', $vendors,['label'=> trans('subscription.vendor')]) !!}
                {!! FormField::radios('status_id', ['Non Active','Active'],['label'=> trans('app.status')]) !!}
                {!! FormField::radios('type_id', $subscriptionTypes, ['label' => trans('subscription.type'), 'value' => Request::get('type_id')]) !!}
                {!! FormField::textarea('notes',['label'=> trans('subscription.notes')]) !!}
            </div>

            <div class="panel-footer">
                {!! Form::submit(trans('subscription.update'), ['class'=>'btn btn-primary']) !!}
                {!! link_to_route('subscriptions.show', trans('app.show'), [$subscription->id], ['class' => 'btn btn-info']) !!}
                {!! link_to_route('subscriptions.index', trans('subscription.back_to_index'), [], ['class' => 'btn btn-default']) !!}
                {!! link_to_route('subscriptions.delete', trans('subscription.delete'), [$subscription->id], ['class'=>'btn btn-danger pull-right']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
