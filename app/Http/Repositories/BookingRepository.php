<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    protected Booking $model;

    public function __construct(Booking $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with(['user', 'bookable'])->paginate(15);
    }

    public function findById(int $id): ?Booking
    {
        return $this->model->with(['user', 'bookable'])->find($id);
    }

    public function create(array $data): Booking
    {
        return $this->model->create($data);
    }

    public function update(Booking $booking, array $data): bool
    {
        return $booking->update($data);
    }

    public function delete(Booking $booking): bool
    {
        return $booking->delete();
    }
}
