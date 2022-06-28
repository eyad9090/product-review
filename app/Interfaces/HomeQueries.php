<?php
namespace App\Interfaces;


interface HomeQueries {
    public function productRating();
    public function recentReviews($rating);
    public function topRated($rating);
}
