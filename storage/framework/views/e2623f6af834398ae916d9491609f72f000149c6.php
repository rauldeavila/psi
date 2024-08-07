

<?php $__env->startSection('content'); ?>
    <h1>Edição de Dados</h1>

    <?php if($errors->any()): ?>
        <div>
            <strong>Erros de Validação:</strong>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('edicao.update', $dados->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <label for="NU_CONTRATO">Número do Contrato:</label>
        <input type="text" id="NU_CONTRATO" name="NU_CONTRATO" value="<?php echo e($dados->NU_CONTRATO); ?>" required><br>
        
        <label for="DT_ASSINATURA">Data de Assinatura:</label>
        <input type="date" id="DT_ASSINATURA" name="DT_ASSINATURA" value="<?php echo e(\Carbon\Carbon::parse($dados->DT_ASSINATURA)->format('Y-m-d')); ?>" required><br>
        
        <label for="VR_FINANCIAMENTO">Valor do Financiamento:</label>
        <input type="text" id="VR_FINANCIAMENTO" name="VR_FINANCIAMENTO" value="<?php echo e($dados->VR_FINANCIAMENTO); ?>" required><br>
        
        <label for="NU_CPF">CPF:</label>
        <input type="text" id="NU_CPF" name="NU_CPF" value="<?php echo e($dados->NU_CPF); ?>" required><br>
        
        <label for="NO_MUTUARIO">Nome do Mutuário:</label>
        <input type="text" id="NO_MUTUARIO" name="NO_MUTUARIO" value="<?php echo e($dados->NO_MUTUARIO); ?>" required><br>
        
        <label for="NU_CEP">CEP:</label>
        <input type="text" id="NU_CEP" name="NU_CEP" value="<?php echo e($dados->NU_CEP); ?>" required><br>
        
        <label for="NO_MUNICIPIO">Município:</label>
        <input type="text" id="NO_MUNICIPIO" name="NO_MUNICIPIO" value="<?php echo e($dados->NO_MUNICIPIO); ?>" required><br>
        
        <label for="SG_UF">UF:</label>
        <input type="text" id="SG_UF" name="SG_UF" value="<?php echo e($dados->SG_UF); ?>" required><br>
        
        <div class="button-group">
            <button type="button" class="btn-secondary" onclick="window.location='<?php echo e(route('consulta.index')); ?>'">Voltar</button>
            <button type="submit" class="btn-primary">Salvar</button>
        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $('#VR_FINANCIAMENTO').mask('000.000.000.000.000,00', {reverse: true});
            $('#NU_CPF').mask('000.000.000-00');
            $('#NU_CEP').mask('00000-000');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\c128550\2057-cefus\resources\views/edicao.blade.php ENDPATH**/ ?>