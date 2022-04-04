// Our filter function
function setBlockCustomClassName( className, blockName ) {
    return blockName === 'core/table' ?
        'table' :
        className;
}
 
// Adding the filter
wp.hooks.addFilter(
    'blocks.getBlockDefaultClassName',
    'my-plugin/set-block-custom-class-name',
    setBlockCustomClassName
);