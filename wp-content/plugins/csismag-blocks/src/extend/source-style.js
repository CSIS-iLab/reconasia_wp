/**
 * Modify Pullquote
 *
 */

/**
 * Add Source Style Button.
 * @param settings
 * @param name
 */

const { registerFormatType, toggleFormat } = wp.richText;
const { RichTextToolbarButton } = wp.blockEditor;

const SourceStyleBtn = (props) => {
  return (
    <RichTextToolbarButton
      icon="editor-code"
      title="Source Info Styles"
      onClick={() => {
        props.onChange(
          toggleFormat(props.value, { type: "reconasia-blocks/source-style" })
        );
      }}
      isActive={props.isActive}
    />
  );
};

registerFormatType("reconasia-blocks/source-style", {
  title: "Sample output",
  tagName: "span",
  className: "caption__source",
  edit: SourceStyleBtn,
});
