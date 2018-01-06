@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLong">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <button class="fab" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus" aria-hidden="true" ></i></button>
        <div class="col-md-6 col-12 offset-md-4">
            <div class="search-wrapper">
                <form class="form-inline custom">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Search</label>
                    <div class="input-group mb-2 mr-sm-2 col-md-8">
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                               placeholder="Search Topics">
                        <button class="btn btn-custom" type="button"><i class="fa fa-search"></i></button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col ">
            <div class="post-wrapper">
                <div class="post">
                    <div class="row">

                        <div class="col-2 col-md-1">
                            <div class="post-info">
                                <div class="upvotes">
                                    <div class="upvotes-container">
                                        <a href="" class="vote-up">
                                            <i class="fa fa-3x fa-angle-up"></i>
                                        </a>
                                        <span>20</span>
                                        <a href="" class="vote-down">
                                            <i class="fa fa-3x fa-angle-down"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-md-9">
                            <h4>10 Kids Unaware of Their Halloween Costume</h4>
                            <p>It's one thing to subject yourself to a Halloween costume mishap because, hey, that's
                                your prerogative.</p>
                            <div class="views">
                                <i class="fa fa-clock-o"></i>
                                <span>20 min ago</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="post-info float-right">
                                <div>
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    &nbsp;<span>2000</span>
                                </div>
                                <div>
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    &nbsp;&nbsp;<span>20</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="divline"></div>
                <div class="post">
                    <div class="row">
                        <div class="col-2 col-md-1">
                            <div class="post-info">
                                <div class="upvotes">
                                    <div class="upvotes-container">
                                        <a href="" class="vote-down">
                                            <i class="fa fa-3x fa-angle-up"></i>
                                        </a>
                                        <span>2</span>
                                        <a href="" class="vote-down">
                                            <i class="fa fa-3x fa-angle-down"></i>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-10 col-md-9">
                            <h4>What Instagram Ads Will Look Like</h4>
                            <p>Instagram offered a first glimpse at what its ads will look like in a blog post Thursday.
                                The sample ad, which you can see below.</p>
                            <div class="views">
                                <i class="fa fa-clock-o"></i>
                                <span>30 min ago</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="post-info float-right">
                                <div>
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    &nbsp;<span>1500</span>
                                </div>
                                <div>
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    &nbsp;&nbsp;<span>25</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divline"></div>
                <div class="post">
                    <div class="row">
                        <div class="col-2 col-md-1">
                            <div class="post-info">
                                <div class="upvotes">
                                    <div class="upvotes-container">
                                        <a href="" class="vote-down">
                                            <i class="fa fa-3x fa-angle-up"></i>
                                        </a>
                                        <span>0</span>
                                        <a href="" class="vote-down">
                                            <i class="fa fa-3x fa-angle-down"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-md-9">
                            <h4>The Future of Magazines Is on Tablets</h4>
                            <p>Eric Schmidt has seen the future of magazines, and it's on the tablet. At a Magazine
                                Publishers Association.</p>
                            <div class="views">
                                <i class="fa fa-clock-o"></i>
                                <span>41 min ago</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="post-info float-right">
                                <div>
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    &nbsp;<span>100</span>
                                </div>
                                <div>
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    &nbsp;&nbsp;<span>5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divline"></div>
                <div class="post">
                    <div class="row">
                        <div class="col-2 col-md-1">
                            <div class="post-info">
                                <div class="upvotes">
                                    <div class="upvotes-container">
                                        <a href="" class="vote-up">
                                            <i class="fa fa-3x fa-angle-up"></i>
                                        </a>
                                        <span>10</span>
                                        <a href="" class="vote-down">
                                            <i class="fa fa-3x fa-angle-down"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-md-9">
                            <h4>Pinterest Now Worth $3.8 Billion</h4>
                            <p>Pinterest's valuation is closing in on $4 billion after its latest funding round of $225
                                million, according to a report.</p>
                            <div class="views">
                                <i class="fa fa-clock-o"></i>
                                <span>55 min ago</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="post-info float-right">
                                <div>
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    &nbsp;<span>105</span>
                                </div>
                                <div>
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    &nbsp;&nbsp;<span>1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="post-wrapper">
                <h4 class="sub-title">Categories</h4>
                <div class="divline"></div>
                <div class="sub-body">
                    <ul>
                        <li><a href="#">General</a><span class="badge badge-pill float-right">10</span></li>
                        <li><a href="#">FAQs</a><span class="badge badge-pill float-right">2</span></li>
                        <li><a href="#">Support</a><span class="badge badge-pill float-right">30</span></li>
                        <li><a href="#">Trading for Money</a><span class="badge badge-pill float-right">2</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-6 offset-2 col-md-6 offset-md-0">
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </div>

@endsection