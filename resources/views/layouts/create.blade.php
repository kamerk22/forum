<div id="brand-modal">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Start New Dicussion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="custom-modal">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="category">Category</label>
                                <select id="category" class="form-control">
                                    <option selected>General</option>
                                    <option>FAQs</option>
                                    <option>Support</option>
                                    <option>Trading for Money</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" rows="5"
                                          placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-brand">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <button class="fab" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>
    </button>
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