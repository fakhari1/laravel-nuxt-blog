<?php

namespace Modules\Global\Extendables;

class BaseCommandAction extends BaseAction
{
    public function handle(array $attributes = [])
    {
        $this->fill($attributes);
        $this->validateAttributes();
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
        return Responder::response(
            $this->handle($this->attributes), 200, trans('Request successfully processed')
        );
    }
}
