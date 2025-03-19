<?php

namespace App\Repositories;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TranslationRepository
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = Translation::query();

        if (!empty($filters['tag'])) {
            $query->whereJsonContains('tags', $filters['tag']);
        }
        if (!empty($filters['key'])) {
            $query->where('key', $filters['key']);
        }
        if (!empty($filters['content'])) {
            $query->where('content', 'LIKE', "%{$filters['content']}%");
        }

        return $query->paginate(1000);
    }

    public function create(array $data): Translation
    {
        return Translation::create($data);
    }

    public function update(int $id, array $data): Translation
    {
        $translation = Translation::findOrFail($id);
        $translation->update($data);
        return $translation;
    }

    public function delete(int $id): bool
    {
        return Translation::findOrFail($id)->delete();
    }

    public function export(): Collection
    {
        return Translation::all()->groupBy('locale');
    }
}
