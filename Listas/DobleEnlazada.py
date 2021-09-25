class Node(object):
    "" "Crear una clase de nodo" ""

    def __init__(self, data):
        self.data = data
        self.pre = None
        self.next = None


class CreateDoubleLinkedList(object):
    "" "Crear una clase que cree una lista doblemente vinculada" ""

    def __init__(self):
        self.head = None

    def is_empty(self):
        "" "Determine si una lista doblemente vinculada es una lista vinculada vacía" ""
        return self.head is None

    def length(self):
        "" "Obtener la longitud de una lista doblemente vinculada" ""
        cur = self.head
        count = 0
        while cur is not None:
            count += 1
            cur = cur.next
        return count

    def traversal(self):
        "" "Recorriendo una lista doblemente vinculada" ""
        cur = self.head
        if self.is_empty():
            print("¡La lista vinculada está vacía!")
        return
        while cur is not None:
            print(cur.data)
            cur = cur.next

    def node_is_exist(self, data):
        "" "Buscar si el nodo especificado existe" ""
        cur = self.head
        while cur is not None:
            if cur.data == data:
                return True
            else:
                cur = cur.next
        return False

    def add_first(self, data):
        "" "Agregar un nodo en la cabeza" ""
        node = Node(data)
        if self.is_empty():
            self.head = node
        else:
            # El nuevo nodo apunta hacia atrás al nodo principal
            node.next = self.head
            # El nodo principal apunta hacia el nuevo nodo
            self.head.pre = node
            # Dar el título del nodo principal al nuevo nodo
            self.head = node

    def add_last(self, data):
        "" "Agregar un nodo al final" ""
        node = Node(data)
        if self.is_empty():
            self.head = node
        else:
            cur = self.head
            # El puntero se mueve hasta el final
            while cur.next is not None:
                cur = cur.next
            # El puntero sucesor del nodo de cola apunta al nuevo nodo
            cur.next = node
            # El puntero precursor del nuevo nodo apunta al nodo de cola
            node.pre = cur

    def insert_node(self, index, data):
        "" "Agregar un nodo en la posición especificada" ""
        if index < 0 or index > self.length():
            print("¡La posición del nodo está mal!")
            return False
        elif index == 0:
            self.add_first(data)
        elif index == self.length():
            self.add_last(data)
        else:
            node = Node(data)
            cur = self.head
            pres = None
            count = 0
            # Mover a la ubicación que se agregará
            while count < index:
                pres = cur
                cur = cur.next
                count += 1
            # El nuevo nodo y el nodo frente a él apuntan entre sí
            pres.next = node
            node.pre = pres
            # El nuevo nodo y el nodo detrás de él apuntan entre sí
            node.next = cur
            cur.pre = node

    def remove_node(self, data):
        "" "Eliminar nodo especificado" ""
        if self.is_empty():
            print("Falló la eliminación, ¡la lista vinculada está vacía!")
            return False
        elif data == self.head.data:
            self.head.next.pre = None
            self.head = self.head.next
        else:
            cur = self.head
            # Mover a la posición del nodo que se va a eliminar
            while cur.data != data:
                cur = cur.next
            # El nodo sucesor del nodo actual está vacío, lo que indica que es el nodo de cola
            if cur.next is None:
                cur.pre.next = None
                cur.pre = None
            else:
                cur.pre.next = cur.next
                cur.next.pre = cur.pre


if __name__ == '__main__':
    lists = CreateDoubleLinkedList()
    lists.add_last(3)
    lists.add_first(2)
    lists.add_first(1)
    lists.add_last(5)
    lists.insert_node(3, 4)
    lists.traversal()
    print("Si la lista vinculada está vacía:", lists.is_empty())
    print("Obtener la longitud de la lista vinculada:", lists.length())
    print("¿Existe el nodo de cambio:", lists.node_is_exist(2))
    lists.remove_node(1)
    lists.remove_node(5)
    print("Recorrido después de eliminar el nodo:")
    lists.traversal()
