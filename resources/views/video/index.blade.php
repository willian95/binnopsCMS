@extends("layouts.main")

@section("content")

    <div class="d-flex flex-column-fluid" id="dev-products">
        
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Actualizar link
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <div class="row">
                        
                        <div class="loader-cover-custom" v-if="loading == true">
                            <div class="loader-custom"></div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Link</label>
                                <input type="text" class="form-control" v-model="link">
                                <small v-if="errors.hasOwnProperty('link')">@{{ errors['link'][0] }}</small>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p class="text-center">
                                <button class="btn btn-success" @click="store()">Actualizar</button>
                            </p>
                        </div>
                    </div>


                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->


    </div>

@endsection

@push("scripts")

    <script>
        
        const app = new Vue({
            el: '#dev-products',
            data(){
                return{
                    errors:[],
                    loading:false,
                    link:"{{ App\Models\Video::first()->link }}",
                }
            },
            methods:{
                
                store(){
                    this.errors = []
                    this.loading = true
                    
                    axios.post("{{ url('/video/update') }}", {link:this.link}).then(res => {
                    this.loading = false
                        if(res.data.success == true){

                            swal({
                                title: "Excelente!",
                                text: "Video actualizado!",
                                icon: "success"
                            })

                        }else{
                            
                            swal({
                                title: "Lo sentimos!",
                                text: "Hubo un problema!",
                                icon: "error"
                            })

                        }

                    }).catch(err => {
                        this.loading = false
                        this.errors = err.response.data.errors
                    })

                    
                    

                },
            }
        })
    
    </script>

@endpush