<!DOCTYPE html>
<html>
    <head>
        <title>
            Laravel Ajax CRUD Example
        </title>
        <meta content="{{ csrf_token() }}" name="csrf-token">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet" type="text/css">
            </link>
        </meta>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>
                            Laravel Ajax CRUD Example
                        </h2>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-success" data-target="#create-item" data-toggle="modal" type="button">
                            Create Item
                        </button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th width="200px">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <ul class="pagination-sm" id="pagination">
            </ul>
            <!-- Create Item Modal -->
            <div aria-labelledby="myModalLabel" class="modal fade" id="create-item" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Create Item
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('item-ajax.store') }}" data-toggle="validator" method="POST">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label" for="title">
                                        Title:
                                    </label>
                                    <input class="form-control" data-error="Please enter title." name="title" required="" type="text"/>
                                    <div class="help-block with-errors">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">
                                        Description:
                                    </label>
                                    <textarea class="form-control" data-error="Please enter description." name="description" required="">
                                    </textarea>
                                    <div class="help-block with-errors">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn crud-submit btn-success" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Item Modal -->
            <div aria-labelledby="myModalLabel" class="modal fade" id="edit-item" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Edit Item
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form action="/item-ajax/14" data-toggle="validator" method="put">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label" for="title">
                                        Title:
                                    </label>
                                    <input class="form-control" data-error="Please enter title." name="title" required="" type="text"/>
                                    <div class="help-block with-errors">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">
                                        Description:
                                    </label>
                                    <textarea class="form-control" data-error="Please enter description." name="description" required="">
                                    </textarea>
                                    <div class="help-block with-errors">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success crud-submit-edit" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js" type="text/javascript">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js" type="text/javascript">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js" type="text/javascript">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
        </script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript">
        </script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
            <script type="text/javascript">
                var url = "<?php echo route('item-ajax.index')?>";
            </script>
            <script src="/js/item-ajax.js"></script> 
        </link>
    </body>
</html>