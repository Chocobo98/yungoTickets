@extends('layouts.app')
@section('content')
<div id="app" class="sm:mt-0 px-6">
    <div class="md:grid md:grid-cols-6 md:gap-6 md:grid-rows-2 md:mt-5">
    @foreach ($data as $dato)
        @include('tablas.ticketInfo',['dato'=>$dato])
    @endforeach
    </div>
</div>

@endsection
@section('scripts')
    <script>
        /*
        const app = new Vue({
            el: '#app',
            data: {
                comentarios:{},
                comentariosBox: '',
                ticket:{!! $data->toJson() !!}
            },
            mounted(){
                    this.getComments();
            },
            methods:
            {
                getComments(){
                    axios.get(`/api/tickets/${this.ticket.idTicket}/comments`)
                    .then((response)=>{
                        this.comentarios = response.data;
                    })
                    .catch(function (error){
                        console.log(error);
                    });
                },
                postComment(){
                    axios.post(`/api/tickets/${this.ticket.idTicket}/comments`,{
                        comentario: this.comentariosBox
                    })
                    .then((response)=>{
                        this.comentarios.unshift(response.data);
                        this.comentariosBox = '';
                    })
                    .catch((error)=>{
                        console.log(error);
                    });
                }
            }
        });
        */
    </script>
@endsection