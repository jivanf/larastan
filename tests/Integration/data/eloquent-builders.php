<?php

namespace ModelBuilder;

use App\User;
use Illuminate\Database\Eloquent\Builder;

/** @extends Builder<User> */
class UserBuilder extends Builder
{
    /** @return $this */
    public function whereName(string $name): static
    {
        return $this->where('name', $name);
    }
}
