const draggables = document.querySelectorAll(".draggable");
const containers = document.querySelectorAll(".box");

draggables.forEach(draggable => {
  draggable.addEventListener("dragstart", () => {
    draggable.classList.add("dragging");
  });

  draggable.addEventListener("dragend", () => {
    draggable.classList.remove("dragging");
  });
});

containers.forEach(container => {
  container.addEventListener("dragover", (ev = new DragEvent()) => {
    ev.preventDefault();
    const draggable = document.querySelector(".dragging");
    const element = getDropTargetElement(container, ev.clientY);
    if (element == null || element == undefined) {
      container.appendChild(draggable);
    } else {
      container.insertBefore(draggable, element);
    }
  });
});

function getDropTargetElement(container, y) {
  const draggableElements = [
    ...container.querySelectorAll(".draggable:not(.dragging)")
  ];

  return draggableElements.reduce(
    (closest, child) => {
      const box = child.getBoundingClientRect();
      const offset = y - box.top - box.height / 2;
      if (offset < 0 && offset > closest.offset) {
        return { offset: offset, element: child };
      } else {
        return closest;
      }
    },
    { offset: Number.NEGATIVE_INFINITY }
  ).element;
}
