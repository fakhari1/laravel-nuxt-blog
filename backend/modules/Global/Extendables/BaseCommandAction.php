<?php

namespace Modules\Global\Extendables;
use Lorisleiva\Actions\ActionRequest;
use Modules\Global\Extendables\BaseAction;
use Illuminate\Support\Facades\DB;
use Modules\Global\Services\Api\Responder;


class BaseCommandAction extends BaseAction
{
    public function handle(array $attributes = [])
    {
        $this->fill($attributes);
        dd($this->validateAttributes());
        $result = null;
        DB::beginTransaction();
        try {
            $result = $this->execute($attributes);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $this->handleThrowable($e);
        }
        return $result;
    }
    public function execute(array $attributes=[]){
        return $attributes;
    }
    public function asController(ActionRequest $request)
    {
        $this->fillFromRequest($request);
        $this->validateAttributes();
        return Responder::response(
            $this->handle($this->attributes),
            200,
            trans('Request successfully processed')
        );
    }
}
