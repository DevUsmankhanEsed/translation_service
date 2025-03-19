<?php

namespace App\Http\Controllers\API;

use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\TranslationRepository;
use App\Http\Requests\StoreTranslationRequest;
use App\Http\Requests\UpdateTranslationRequest;

class TranslationController extends Controller
{
    protected TranslationRepository $translationRepository;

    public function __construct(TranslationRepository $translationRepository)
    {
        $this->translationRepository = $translationRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $translations = $this->translationRepository->getAll($request->all());
        return response()->json($translations);
    }

    public function store(StoreTranslationRequest $request): JsonResponse
    {
        $translation = $this->translationRepository->create($request->validated());
        return response()->json($translation, 201);
    }

    public function update(UpdateTranslationRequest $request, $id): JsonResponse
    {
        $translation = $this->translationRepository->update($id, $request->validated());
        return response()->json($translation);
    }

    public function export(): JsonResponse
    {
        $translations = $this->translationRepository->export();
        return response()->json($translations);
    }

    public function destroy($id): JsonResponse
    {
        $deleted = $this->translationRepository->delete($id);

        return $deleted
            ? response()->json(['message' => 'Deleted Successfully!'], 204)
            : response()->json(['error' => 'Something went wrong!'], 500);
    }
}
