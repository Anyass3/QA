<?php

interface ControllerConventions
{
    // show all items
    public function index();

    // show single item
    public function show();

    // show form to create new item
    public function create();

    // store new item
    public function store();

    // show form to edit item
    public function edit();

    // update item
    public function update();

    // delete item
    public function destroy();
}
