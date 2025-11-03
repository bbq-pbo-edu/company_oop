<?php

interface ControllerInterface
{
    public function show(int $id): void;
    public function showAll(): void;
    public function create(): void;
    public function update(int $id): void;
    public function delete(int $id): void;
}