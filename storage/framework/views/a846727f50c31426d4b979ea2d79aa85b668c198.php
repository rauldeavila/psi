

<?php $__env->startSection('content'); ?>
    <h1>Consulta de Contratos</h1>

    <!-- Mostra pop up de edição bem sucedida quando retorna da tela de edição -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success' )); ?>

        </div>
        <div class="progress-bar"></div>
    <?php endif; ?>

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

    <form action="<?php echo e(route('consulta.index')); ?>" method="GET" class="consulta-form">
        <label for="filtro">Número do Contrato:</label>
        <input type="text" id="filtro" name="filtro" value="<?php echo e(old('filtro')); ?>">
        <button type="submit">Pesquisar</button>
    </form>

    <?php if(isset($dados) && $dados->count() > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Número do Contrato</th>
                    <th>Data de Assinatura</th>
                    <th>Valor do Financiamento</th>
                    <th>CPF</th>
                    <th>Nome do Mutuário</th>
                    <th>CEP</th>
                    <th>Município</th>
                    <th>UF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($dado->NU_CONTRATO); ?></td>
                        <td><?php echo e($dado->DT_ASSINATURA); ?></td>
                        <td><?php echo e($dado->VR_FINANCIAMENTO); ?></td>
                        <td><?php echo e($dado->NU_CPF); ?></td>
                        <td><?php echo e($dado->NO_MUTUARIO); ?></td>
                        <td><?php echo e($dado->NU_CEP); ?></td>
                        <td><?php echo e($dado->NO_MUNICIPIO); ?></td>
                        <td><?php echo e($dado->SG_UF); ?></td>
                        <td>
                            <a href="<?php echo e(route('edicao.edit', $dado->id)); ?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum contrato encontrado.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $('#VR_FINANCIAMENTO').mask('000.000.000.000.000,00', {reverse: true});
            $('#NU_CPF').mask('000.000.000-00');
            $('#NU_CEP').mask('00000-000');

            setTimeout(function() {
                $('.alert-success').fadeOut();
            }, 5000);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\c128550\2057-cefus\resources\views/consulta.blade.php ENDPATH**/ ?>