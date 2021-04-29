@extends('layouts.app')
@section('content')
<div id="app" class="sm:mt-0 px-6">
    <div class="md:grid md:grid-cols-5 md:gap-6 md:mt-5">
    @foreach ($data as $dato)
        @include('tablas.ticketInfo',['dato'=>$dato])
    @endforeach
    </div>
</div>
{{--
<h3>Comentarios:<h3>
<div class="mb-13">
    <textarea class="form-control" rows="3" name="body" placeholder="Leave a comment" v-model="comentariosBox"></textarea>
    <button class="btn btn-success" class="mt-3" @click.prevent="postComment">Subir comentario</button>
</div>

<div class="media mt-5" v-for="comment in comentarios">
    <div class="media-left">
        <a href="#"></a>
    </div>
   <div class="media-body">
        <h4 class="media-heading"></h4>
        <p>
            @{{comment.comentario}}
        </p>
        <span class="text-gray-400">@{{comment.created_at}}</span>
   </div>
</div>
--}}
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