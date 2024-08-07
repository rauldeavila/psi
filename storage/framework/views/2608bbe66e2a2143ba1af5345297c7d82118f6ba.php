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
                <td><?php echo e(\Carbon\Carbon::parse($dado->DT_ASSINATURA)->format('d/m/Y')); ?></td>
                <td><?php echo e(number_format($dado->VR_FINANCIAMENTO, 2, ',', '.')); ?></td>
                <td><?php echo e(substr($dado->NU_CPF, 0, 3) . '.' . substr($dado->NU_CPF, 3, 3) . '.' . substr($dado->NU_CPF, 6, 3) . '-' . substr($dado->NU_CPF, 9, 2)); ?></td>
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

<?php /**PATH C:\Users\c128550\2057-cefus\resources\views/partials/dados-table.blade.php ENDPATH**/ ?>