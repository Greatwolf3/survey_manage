@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @section('dashboard_menu')
                        @if (Auth::check() && (Auth::user()->role=='admin'))
                        <div class="row my-2">
                            <div class="col-lg-12 text-center">
                                <a class="btn btn-primary" href="{{ route('questions.questions.index') }}" role="button">Questions</a>
                            </div>
                        </div>
                        @endif
                    @show
                    @section('dashboard_content')
                        <!-- Button trigger modal -->

                            <!-- Modal -->
                            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <iframe width="100%" height="350" src="" frameborder="0" allowfullscreen></iframe>
                                        <div class="text-center"> R.I.P Rutger Hauer</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @show
                </div>
            </div>
        </div>
    </div>


@endsection
@section('add_script')
    <script>

        jQuery(function() {
            jQuery(".video").click(function () {
                var theModal = $(this).data("target"),
                    videoSRC = $(this).attr("data-video"),
                    videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
                jQuery(theModal + ' iframe').attr('src', videoSRCauto);
                console.log('pippo');
                jQuery(theModal + '#videoModal').attr('style','display:block').addClass('show');
                jQuery(theModal + ' button.close').click(function () {
                    jQuery(theModal + ' iframe').attr('src', videoSRC);
                    jQuery(theModal + '#videoModal').removeClass('show');
                    jQuery(theModal + '#videoModal').addClass('fade');
                    jQuery(theModal + '#videoModal').hide();
                });
            });
        });
    </script>
@endsection